import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { ProtectYourFinancesComponent } from './protect-your-finances.component';

describe('ProtectYourFinancesComponent', () => {
  let component: ProtectYourFinancesComponent;
  let fixture: ComponentFixture<ProtectYourFinancesComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ ProtectYourFinancesComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(ProtectYourFinancesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
