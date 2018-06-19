import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FinancialPoaDocComponent } from './financial-poa-doc.component';

describe('FinancialPoaDocComponent', () => {
  let component: FinancialPoaDocComponent;
  let fixture: ComponentFixture<FinancialPoaDocComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FinancialPoaDocComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FinancialPoaDocComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
