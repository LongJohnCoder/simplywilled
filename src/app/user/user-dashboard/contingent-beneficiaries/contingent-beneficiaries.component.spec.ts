import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ContingentBeneficiariesComponent } from './contingent-beneficiaries.component';

describe('ContingentBeneficiariesComponent', () => {
  let component: ContingentBeneficiariesComponent;
  let fixture: ComponentFixture<ContingentBeneficiariesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ContingentBeneficiariesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ContingentBeneficiariesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
